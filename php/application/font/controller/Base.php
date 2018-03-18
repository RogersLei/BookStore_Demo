<?php

namespace app\font\controller;

use app\common\controller\Common;
use think\Request;
use think\Db;

class Base extends Common
{
    public function login()
        {
            $user = model('User');

            $account = input('account');
            $checkPass = input('pass');
            $data = $user->login($account,$checkPass);
            return $data;
        }

    public function register()
    {
        $user = model('User');
        $name = input('nickname');
        $account = input('account');
        $pass = input('pwd');
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        if($name != NULL && $account != NULL)
        {
            $data = $user->register($name, $account, $pass);
            return $data;
        }
    }

    public function updateUser()
    {
        $user = model('User');
        $account = input('account');
        $name = input('name');
        $src = input('src');
        $pass = input('pass');
        if($pass !== ""){
            $pass = password_hash($pass, PASSWORD_DEFAULT);
        }
        $data = $user->updateUser($account, $name, $src, $pass);
        return $data;
    }

    public function addGoodByID()
    {
        $goods = model('Goods');
        $account = input('account');
        $goodID = input('id');
        $num = input('num');
        $book = input('book');
        $data = $goods->addGoodByID($account, $goodID, $num, $book);
        return $data;
    }

    public function insertAddress()
    {
        $add = model('Address');
        $account = input('account');
        $address = input('address');
        $data = $add->insertAdd($account,$address);
        return $data;
    }

}
