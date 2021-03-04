<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }


    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function getAllParents() {
        $res = [];

        $cat = $this;
        while ($parent = $cat->parent) {
            $res[] = $parent;
            $cat = $parent;
        }

        return $res;
    }

    public function countSites() {
        return $this->sites()->count();
    }

    public function getAllChilds() {
        $res = [];

        foreach ($this->childs as $child) {
            $res[] = $child;
            $res = array_merge($res, $child->getAllChilds());
        }

        return $res;
    }

    public function countAllSites() {
        $res = 0;

        $res += $this->countSites();

        foreach ($this->getAllChilds() as $child) {
            $res += $child->countSites();
        }

        return $res;
    }

//    public function getBestSubCategories() {
//        return $this->childs()
//            ->orderBy('has_sites', 'desc')
//            ->limit(3)
//            ->get();
//    }

    public function url() {
        return '/category/'.$this->id;
    }
}
