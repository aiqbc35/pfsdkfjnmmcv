<?php
/**
 * Created by PhpStorm.
 * User: rookie
 * Url : PTP6.Com
 * Date: 2017/8/5
 * Time: 14:05
 */

namespace App\Http\Controllers;


use App\AdminUser;
use App\Service;
use App\Uservip;
use App\Link;
use App\Video;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class ApiController
{

    /**
     * 首页接口
     * @param Request $request
     * @return array
     */
    public function getHome (Request $request)
    {
        $this->autoLogin($request);

        $top = $this->getTop($request->top);
        $public = $this->getPublic(0,0,$request->limit);
//        $private = $this->getPublic(1);
        $link = $this->getLink();
        $data = array(
            'top' => $top,
            'public' => $public,
//            'private' => $private,
            'links' => $link,
            'image' => self::getImagesService()
        );
        return $data;
    }

    /**
     * 随机调取视频服务器
     * @param Request $request
     * @return mixed
     */
    static public function getVideService ()
    {
        if (Cache::has('videoServer')) {
            $serviceList = Cache::get('videoServer');
            $list = explode("||",$serviceList);
            return $list[array_rand($list,1)];
        }else{
            $ret = Service::find(3);
            Cache::put('videoServer',$ret->video,3600);
            return self::getVideService();
        }

    }

    /**
     * 获取图片服务器
     * @return mixed
     */
    static public function getImagesService ()
    {
        if (Cache::has('imagesServer')) {
            $images = Cache::get('imagesServer');
            return $images;
        }else{
            $ret = Service::find(3);
            Cache::put('imagesServer',$ret->images,3600);
            return self::getImagesService();
        }

    }
    /**
     * 根据cookie获取用户信息
     * @param Request $request
     * @return array
     */
    public function getUser (Request $request)
    {
        $this->autoLogin($request);
        $cookie = $request->cookie('tokenIdAuth');
        if ($cookie) {

            $info = AdminUser::where('id','=',$cookie)->first();
            if (empty($info)) {
                Cookie::forget('tokenIdAuth');
                return array(
                    'status' => 2,
                    'msg' => '没有这个用户'
                );
            }

            $vipstatus = 0;
            if ($info->type == 1) {

                $vip = Uservip::where('user_id','=',$info->id)->first();

                if (empty($vip)) {
                    $info->type = 0;
                    $info->save();
                    $vipstatus = 1;
                }
                if (time() > $vip->stoptime){
                    $info->type = 0;
                    $info->save();
                    $vipstatus = 1;
                }
                $info->viptime = $vip->stoptime;
                $info->vipstatus = $vipstatus;
            }

            return array(
                'status' => 1,
                'msg' => $info,
            );

        }else{
            return array(
                'status' => 2,
                'msg' => '您还没有登陆！'
            );
        }
    }

    public function login (Request $request)
    {
        $data = $request->input();

        if ($request->isMethod('post')) {

            $errorInfo = $this->IsInputInfo($data);
            if ($errorInfo != false) {
                return $errorInfo;
            }

            $info = AdminUser::where('username','=',$data['email'])
                ->where('password','=',md5($data['passwd']))
                ->first();
            if ($info) {
                $info->logintime = time();
                $info->save();

                Cookie::queue('tokenIdAuth',$info->id,3600);
                Session::put('user_id',$info->id);
                Session::put('email',$info->username);
                return array(
                    'status' => 1,
                    'msg' => '登陆成功！'
                );
            }else{
                return array(
                    'status' => 5,
                    'msg' => '邮箱或密码错误！'
                );
            }

        }
    }


    private function autoLogin (Request $request)
    {

        $id = Session::get('user_id');
        if (empty($id)) {
            $cookie = $request->cookie('tokenIdAuth');
            if ($cookie) {
                $info = AdminUser::find($cookie);
                if ($info) {
                    Session::put('user_id',$info->id);
                    Session::put('email',$info->username);
                }
            }
        }
    }

    /**
     * 注册
     * @param Request $request
     * @return array
     */
    public function reg (Request $request)
    {
        $data = $request->input();

        if ($request->isMethod('post')) {

            $errorInfo = $this->IsInputInfo($data);
            if ($errorInfo != false) {
                return $errorInfo;
            }

            $model = new AdminUser();

            $info = $model->where('username','=',$data['email'])->first();

            if (isset($info->username)) {
                return array(
                    'status' => 3,
                    'msg' => '邮箱已存在'
                );
            }

            $da['username'] = $data['email'];
            $da['password'] = md5($data['passwd']);
            $da['addtime'] = time();

            $ret = $model->create($da);
            if ($ret) {
                Cookie::queue('tokenIdAuth',$ret->id,3600);
                return array(
                    'status' => 1,
                    'msg' => '注册成功'
                );
            }else{
                return array(
                    'status' => 4,
                    'msg' => '注册失败'
                );
            }

        }
    }

    /**
     * 随机获取视频
     * @return mixed
     */
    public function random ()
    {

         if (!Cache::has('totalVideo')) {
             $total = Video::where('status','=',1)->get();
             $newtotal = array();
             foreach ($total as $key=>$value){
                 $newtotal[$value->id] = $value;
             }
             Cache::put('totalVideo',$newtotal,1440);
             return $this->random();
         }

        $newtotal = Cache::get('totalVideo');
        $id = array_keys($newtotal);
        $newId = array_rand($id,4);

        return array(
            'status' => 1,
            'msg' => array($newtotal[$id[$newId[0]]],$newtotal[$id[$newId[1]]],$newtotal[$id[$newId[2]]],$newtotal[$id[$newId[3]]]),
            'image' => self::getImagesService()
        );


    }

    /**
     * 获取指定视频
     * @param Request $request
     * @return array
     */
    public function getVideo (Request $request)
    {
        $this->autoLogin($request);
        if ($request->id) {
            $info = Video::find($request->id);
            if ($info) {

                if ($info->status == 0) {
                    return array(
                        'status' => 3,
                        'msg' => '没有这个视频！'
                    );
                }

                $images = self::getImagesService();
                $link = self::getVideService();

                if ($info->type == 1) {

                    $user = $this->getUser($request);

                    if ($user['status'] != 1) {
                        $data['status'] = 11;
                        $data['msg'] = '此为vip影片，请先登陆！';
                        $data['link'] = '/login';
                        return $data;
                    }

                    if ($user['msg']->vipstatus == 1) {
                        $data['status'] = 10;
                        $data['msg'] = '您的会员已过期，请续费后观影！';
                        $data['link'] = '/member/index';
                        return $data;
                    }

                    $data['status'] = 1;
                    $data['info'] = $info;
                    $data['image'] = $images;
                    $data['link'] = $link;


                }else{

                    $data['status'] = 1;
                    $data['info'] = $info;
                    $data['image'] = $images;
                    $data['link'] = $link;

                }
                $info->hit = $info->hit + 1;
                $info->save();

            }else{
                $data['status'] = 3;
                $data['msg'] = 'The video does not exist';
            }
            return $data;
        }else{
            return array(
                'status' => 2,
                'msg' => 'Please select a video'
            );
        }
    }

    /**
     * 获取vip视频列表
     * @param Request $request
     * @return array
     */
    public function getPrivate (Request $request)
    {
        $this->autoLogin($request);

        $start = 0;
        $limit = 16;
        if ($request->limit) {
            $start = $request->limit * $limit;
        }

        $type = empty($request->type) ? 0 : $request->type;
        $list = $this->getPublic($type,$start,$limit);
        $total = $this->getCountVideo($request->type);
        return array(
            'list' => $list,
            'total' => $total,
            'limit' => $limit,
            'image' => self::getImagesService(),
        );
    }

    /**
     * 获取排序前的视频
     * @param int $num
     * @return \Illuminate\Support\Collection
     */
    private function getTop ( $num = 3 )
    {
        if (empty($num)) {
            $num = 3;
        }
        return Video::where('status','=',1)->orderBy('hit','desc')->offset(0)->limit($num)->get();
    }

    /**
     * 统计视频总数
     * @param int $where
     * @return int
     */
    private function getCountVideo ($where = 0)
    {
        return Video::where('type','=',$where)->where('status','=',1)->count();
    }

    /**
     * 查询视频
     * @param int $type  是否vip 1是0否
     * @param int $start 查询启始位置
     * @param int $limit 查询条数
     * @param string $desc 排序
     * @return \Illuminate\Support\Collection
     */
    private function getPublic ($type = 0,$start = 0,$limit = 8,$desc = 'desc')
    {
        return Video::where('type','=',$type)
            ->where('status','=',1)
            ->orderBy('addtime',$desc)
            ->offset($start)
            ->limit($limit)
            ->get();
    }

    private function IsInputInfo ($data)
    {
        if (empty($data['email'])) {
            return array(
                'status' => 2,
                'msg' => '邮箱不能为空'
            );
        }

        if (empty($data['passwd'])) {
            return array(
                'status' => 2,
                'msg' => '密码不能为空'
            );
        }

        $pattern = "/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/";

        if (!preg_match($pattern,$data['email'])) {
            return array(
                'status' => 2,
                'msg' => '请输入正确的邮箱格式'
            );
        }
        return false;
    }

    /**
     * 获取友情链接
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    private function getLink ()
    {
        return Link::orderBy('sort','asc')->get();
    }

}