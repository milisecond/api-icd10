<?php

namespace App\Http\Repositories;

use App\Models\Icd;
use Illuminate\Database\Eloquent\Collection;

class IcdRepository
{
    public function search($keyword):collection
    {
        $icd = Icd::where('name', 'ilike', '%'.$keyword.'%')->orWhere('code', 'ilike', '%'.$keyword.'%')->get();

        return $icd;
    }
}
