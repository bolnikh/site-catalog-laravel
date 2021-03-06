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


    public function url() {
        return '/category/'.$this->id;
    }


    public static function getListForSelect() {
        $arr = Category::all()->toArray();

        array_multisort(array_column($arr, 'name'), $arr);

        $res = [];



        foreach ($arr as $a) {
            if (is_null($a['parent_id'])) {
                $res[] = $a;
                $res = array_merge($res, self::getSubListForSelect($arr, $a['id']));
            }
        }

        $last_res = [];

        foreach ($res as $r) {
            $last_res[$r['id']] = str_repeat('-', $r['depth']).($r['depth'] > 0 ? ' ' : '').$r['name'];
        }

        return $last_res;
    }

    public static function getSubListForSelect($arr, $parent_id) {
        $res = [];

        foreach ($arr as $a) {
            if ($a['parent_id'] == $parent_id) {
                $res[] = $a;
                $res = array_merge($res, self::getSubListForSelect($arr, $a['id']));
            }
        }

        return $res;
    }

}
