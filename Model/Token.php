<?php
namespace App\Model;
use \DateTime;
use App\Model\User;
class Token {
    public static function createToken($id) {
        $date = new DateTime();
        $key = "qwee4452156QHFKLFJVMLL";
        $now = $date->getTimestamp();
        $expire = $now + 3600;
        $infoString = "$key.$id.$now.$expire.$key";
        $encoded = base64_encode($infoString);
        return $encoded;
    }
    public static function verifyToken($token) {
        $key = "qwee4452156QHFKLFJVMLL";
        $date = new DateTime();
        $now = $date->getTimestamp();
        $decodedToken = base64_decode($token);
        $keyGet = substr($decodedToken, 0, strlen($key));
        $KeyLessToken;
        if($key == $keyGet) {
            $KeyLessToken = str_replace($key, "", $decodedToken);
        }
        try {
            $datas = preg_split("/\./", $KeyLessToken);
        } catch (\Throwable $th) {
            return false;
        }
        $user = new User();
        $userStd;
        try {
            $userStd = $user->find($datas[1]);
        } catch (\Throwable $th) {
            return false;
        }
        if($userStd == null) {
            return false;
        }
        $expire = intval($datas[3]);
        if($now > $expire) {
            return null;
        }
        $newToken = self::createToken($datas[1]);
        $userId = intval($datas[1]);
        return ["id" => $userId, "token" => $newToken];
    }
}