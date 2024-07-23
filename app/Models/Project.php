<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    protected $appends = ['images'];
    

    public function getImagesAttribute(){

        return $this->projectDetails->pluck('link');
    }


    public function projectDetails(){

        return $this->hasMany(ProjectDetail::class);
    }
}
