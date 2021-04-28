<?php

namespace App\Admin\Controllers;

use App\Models\CmfSystemhelp;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSystemhelpController extends AdminController {

	protected $title = "系统帮助";

    public function index(Content $content)
    {
        return $content
            ->header('系统帮助')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSystemhelp());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('systemhelpname', __('系统帮助名称'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSystemhelp());
                $form->text('systemhelpname', __('系统帮助名称'))
                ->creationRules('required|max:200|unique:cmf_systemhelp',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('text', __('文本'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('integer', __('整型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统帮助');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统帮助')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSystemhelp());
        return $content
            ->header('系统帮助')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSystemhelp::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('systemhelpname', __('系统帮助名称'));
        $show->field('text', __('文本'));
        $show->field('integer', __('整型'));
        return $show;
        }
}

?>