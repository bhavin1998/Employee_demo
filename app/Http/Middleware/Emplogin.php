<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employeemodel;
use App\Http\Controllers\Employeecontroller;

class Emplogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $emp = Employeemodel::all();
        foreach ($emp as $emp) {
            echo $emp->fname;
            echo "<br>";
        }

        $emp1 = Employeemodel::findorFail(1);
        echo $emp1;

        return $next($request);
    }
}
