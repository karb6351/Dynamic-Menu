<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use NodeTrait;
    use SoftDeletes;

    const MAX_DEPTH = 2;

    protected $softDelete = true;

    protected $fillable = ['name_en', 'name_zh_hk', 'url', 'show'];

    public static function getTree(){
        return self::defaultOrder()->get()->toTree();
    }

    public static function build(Array $data){
        try{
            self::create($data);
        }catch(\Exception $e){
            return false;
        }
        return true;
    }

    public static function rebuild(Array $data, Menu $root = null){
        if (!$root){
            $root = self::whereIsRoot()->get();
        }
        try{
            self::rebuildSubtree($root, $data);
        }catch(\Exception $e){
            return false;
        }
        return true;
    }

    /* database relation */
    public function menus(){
        return $this->hasMany('App\Models\Menu');
    }

    public function menu(){
        return $this->belongsTo('App\Models\Menu');
    }

    /* create base menu */
    public static function init(){
        //demo
        return [
            'name_en' => 'index',
            'name_zh_hk' => '首頁',
            'url' => '/',
            'children' => [
                [
                    'name_en' => 'Forum',
                    'name_zh_hk' => '討論區',
                    'url' => '/category/1',
                    'children' => [
                        [
                            'name_en' => 'Question',
                            'name_zh_hk' => '問題專區',
                            'url' => '/category/1',
                        ],
                    ],
                ],
                [
                    'name_en' => 'Guidance Document',
                    'name_zh_hk' => '指導文件',
                    'url' => '/guidanceDocument/introduction/1',
                    'children' => [
                        [
                            'name_en' => 'Introduction',
                            'name_zh_hk' => '介紹',
                            'url' => '/guidanceDocument/introduction/1',
                            'children' => [
                                [
                                    'name_en' => 'Scope of GD',
                                    'name_zh_hk' => 'Scope of GD',
                                    'url' => '/guidanceDocument/introduction/1',
                                ],
                                [
                                    'name_en' => 'Development Stages',
                                    'name_zh_hk' => 'Development Stages',
                                    'url' => '/guidanceDocument/introduction/2',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'name_en' => 'Registration Scheme',
                    'name_zh_hk' => '註冊計劃',
                    'url' => '/registrationScheme',
                ],
                [
                    'name_en' => 'About',
                    'name_zh_hk' => '關於我們',
                    'url' => '/about',
                ],
                [
                    'name_en' => 'Frequently Asked Questions',
                    'name_zh_hk' => '常見問題',
                    'url' => '/faq',
                ],
            ],
        ];
    }


}
