<?php
namespace App;

use Carbon\Carbon;

class JWTAuth
{
    protected static function publicKey()
    {
        return \File::get(app_path('Support/JWT/jwtRS256.key.pub'));
    }

    protected static function privateKey()
    {
        return \File::get(app_path('Support/JWT/jwtRS256.key'));
    }

    protected static function issue()
    {
        return env('JWT_ISSUE', "https://github.com/jet23058");
    }

    public static function verify($token)
    {
        try {
            $decode = \JWT::decode($token, self::publicKey(), ['RS256']);
            $effectiveTime = Carbon::now()->between(Carbon::parse($decode->issue_at), Carbon::parse($decode->expired_at));
            return $effectiveTime ? ['result' => true, 'message' => "Verified", 'data' => $decode, 'user' => \App\User::where('name', $decode->username)->first()] : ['result' => false, 'message' => "Token Expired"];
        } catch (\Exception $e) {
            return ['result' => false, 'message' => 'Invalid Token', 'exception' => $e->getMessage()];
        }
    }

    public static function generate($auth)
    {
        $data = array(
            "uuid" => uniqid(),
            "issue" => self::issue(),
            "username" => $auth["username"],
            "issue_at" => Carbon::now(),
            "expired_at" => Carbon::now()->addDay(),
        );
        $token = \JWT::encode($data, self::privateKey(), 'RS256');
        return $token;
    }

    public static function valid($auth)
    {
        return \Auth::attempt(['name' => $auth["username"], 'password' => $auth["password"]]);
    }
}
