<?php

namespace App\Admin\Controllers;

use App\Models\CmfSystemtable;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSystemtableController extends AdminController {

	protected $title = "系统表";

    public function index(Content $content)
    {
        return $content
            ->header('系统表')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSystemtable());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('systemtablename', __('系统表名称'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSystemtable());
                $form->text('systemtablename', __('系统表名称'))
                ->creationRules('required|max:200|unique:cmf_systemtable',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统表');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统表')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSystemtable());
        return $content
            ->header('系统表')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSystemtable::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('systemtablename', __('系统表名称'));
        return $show;
        }
}

?>