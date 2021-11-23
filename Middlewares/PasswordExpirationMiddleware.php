<?php

use azankorejo\Respire\Token;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use azankorejo\Respire\Respire;
use Closure;
use Illuminate\Support\Facades\DB;

class PasswordExpirationMiddleware {

  public function handle(Request $request,  Closure $next, ...$table)
  {
    if(is_null($request->user())) {
        throw new ModelNotFoundException('User Session Not Found');
    }
    if($request->user()->token) {
        $checkForExpiration = Token::compareTimestamps($request->user()->password_expiration_date);
        return Token::redirect();
    }
    $checkForExpiration = Password::compareTimestamps($request->user()->password_expiration_date);
    if($checkForExpiration === true) {
      return Password::redirect();
    }
    return $next($request);
  }
}
