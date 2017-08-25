<?php
namespace App\Http\Controllers\Admin;

use App\Code;
use Illuminate\Support\Facades\DB;

class CodeController
{
    static private $sqlCode;
    static private $newCode;

    public function index ()
    {
        $list = Code::with('sort')->get();

        return view('Admin.code',[
            'list' => $list,
            'name' => 'Code'
        ]);
    }

    public function addCode ()
    {

        self::$sqlCode = Code::select('code')->get();
        self::duoToone();
        $result = self::getCode();
        if ($result) {
            $data['status'] = 1;
            $data['msg'] = '新增成功';
        }else{
            $data['status'] = 2;
            $data['msg'] = '新增失败';
        }
        return $data;
    }


    static private function duoToone ()
    {
        $code = self::$sqlCode;
        $newcode = array();

        foreach ($code as $value){
            $newcode[] = $value->code;
        }

        return self::$newCode = $newcode;

    }

    static private function getCode ()
    {
        $code = array();
        $oldcode = self::$newCode;
        $num = 50;
        $time = time();

        for ($i=1;$i<=$num;$i++){
            $de = self::make_coupon_card();
            if (!in_array($de,$oldcode)) {
                $code[$i]['code'] = $de;
                $code[$i]['addtime'] = $time;

            }else{
                $i++;
            }
        }
        $result = DB::table('code')->insert($code);

        if ($result) {
            return true;
        }
        return false;
    }


    static protected function make_coupon_card() {
        $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand = $code[rand(0,25)]
            .strtoupper(dechex(date('m')))
            .date('d').substr(time(),-5)
            .substr(microtime(),2,5)
            .sprintf('%02d',rand(0,99));
        for(
            $a = md5( $rand, true ),
            $s = '0123456789ABCDEFGHIJKLMNOPQRSTUV',
            $d = '',
            $f = 0;
            $f < 8;
            $g = ord( $a[ $f ] ),
            $d .= $s[ ( $g ^ ord( $a[ $f + 8 ] ) ) - $g & 0x1F ],
            $f++
        );
        return $d;
    }

}