<?php

namespace App\Admin\Controllers;

use App\Models\CmfSystemlang;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSystemlangController extends AdminController {

	protected $title = "系统语言设定";

    public function index(Content $content)
    {
        return $content
            ->header('系统语言设定')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSystemlang());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('fieldname', __('字段名称'));
                $grid->column('tablename', __('表名称'));
                $grid->column('chinese', __('中文'));
                $grid->column('english', __('英文'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSystemlang());
                $form->text('fieldname', __('字段名称'))
                ->creationRules('required|max:200|unique:cmf_systemlang',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('tablename', __('表名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('chinese', __('中文'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('english', __('英文'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('remark', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统语言设定');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统语言设定')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSystemlang());
        return $content
            ->header('系统语言设定')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSystemlang::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('fieldname', __('字段名称'));
        $show->field('tablename', __('表名称'));
        $show->field('chinese', __('中文'));
        $show->field('english', __('英文'));
        $show->field('remark', __('备注'));
        return $show;
        }
}

?>