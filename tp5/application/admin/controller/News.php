<?php
namespace app\admin\controller;

use app\admin\model\News as M;
use app\admin\model\Ntype as N;

class News extends Base
{
    public function news_show($id)
    {
        $content = M::where('id',$id)->value('content');
        return view('news_show',['content'=>$content]);
    }
    /**
     * 列表查看
     */
    public function index()
    {   
        //查询数据
        $m = new M();
        $res = $m->pageQuery();
        return view('index',$res);
    }
    /**
     * 加载添加页面
     */
    public function add()
    {   
        $n = new N();
        $list = $n->select();
        return view('add',['list'=>$list]);
    }
    /**
     * 添加
     */
    public function save()
    {
        $m = new M();
        return $m->add();
    }
    /**
     * 禁用
     */
    public function hidden($id)
    {
        $m = new M();
        return $m->forbidden($id);
    }
    /**
     * 启用
     */
    public function show($id)
    {
        $m = new M();
        return $m->star($id);
    }
    /**
     * 进制删除
     */
    public function undel($id)
    {
        $m = new M();
        return $m->undel($id);
    }
    /**
     * 删除
     */
    public function del($id)
    {
        $m = new M();
        return $m->del($id);
    }
    /**
     * 删除
     */
    public function stick($id)
    {
        $m = new M();
        return $m->stick($id);
    }
    /**
     * 加载修改页面
     */
    public function edit($id)
    {
        $m = new M();
        $news = $m->find($id);
        $n = new N();
        $list = $n->select();
        if (empty($list)) {
            return xreturn('失败，请重试',1);  
        }
        return view('edit',['list'=>$list,'news'=>$news]);
    }
    /**
     * 保存更新的资源
     */
    public function update()
    {
        $m = new M();
        return $m->xupdate();
    }

}