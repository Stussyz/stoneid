<?php
namespace App\Filters;

use Illuminate\Http\Request;

/*---------------------------------------------------------------
| This is a GLOBAL Property filter and sort class, you can put your  
| filter and sort method here and call it globally, remember to
| modify the param for the flexibility purposes
-----------------------------------------------------------------
*/

class PropertyFilter
{
    public static function apply($query, Request $request)
    {
        if ($request->filled('type')) {
            $query->where('transaction_type', $request->type);
        }

        switch ($request->sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'a-z':
                $query->orderBy('name');
                break;
            case 'z-a':
                $query->orderByDesc('name');
                break;
            default:
                $query->latest();
        }

        return $query;
    }
}
