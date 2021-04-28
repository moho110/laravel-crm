<?php

namespace App\Admin\Controllers;

use App\Models\CmfSysMenu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSysMenuController extends AdminController {

	protected $title = "系统菜单";

    public function index(Content $content)
    {
        return $content
            ->header('系统菜单')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSysMenu());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('MENU_NAME', __('菜单名称'));
                $grid->column('ENGLISHNAME', __('英文名称'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSysMenu());
                $form->text('MENU_NAME', __('菜单名称'))
                ->creationRules('required|max:200|unique:cmf_sys_menu',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('IMAGE', __('图像'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('ENGLISHNAME', __('英文名称'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统菜单');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统菜单')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSysMenu());
        return $content
            ->header('系统菜单')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSysMenu::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('MENU_NAME', __('菜单名称'));
        $show->field('IMAGE', __('图像'));
        $show->field('ENGLISHNAME', __('英文名称'));
        return $show;
        }
}

?>