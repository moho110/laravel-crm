<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsExpense;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsExpenseController extends AdminController {

	protected $title = "日常费用";

    public function index(Content $content)
    {
        return $content
            ->header('日常费用')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsExpense());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('workId', __('工号'));
                $grid->column('name', __('名称'));
                $grid->column('inDepartment', __('所在部门'));
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsExpense());
                $form->text('workId', __('工号'))
                ->creationRules('required|max:200|unique:cmf_hrms_expense',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('name', __('名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('sex', __('性别'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('inDepartment', __('所在部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('feeType', __('费用类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('feeNumber', __('费用数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('useReason', __('使用理由'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('日常费用');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('日常费用')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsExpense());
        return $content
            ->header('日常费用')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsExpense::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('workId', __('工号'));
        $show->field('name', __('名称'));
        $show->field('sex', __('性别'));
        $show->field('inDepartment', __('所在部门'));
        $show->field('feeType', __('费用类型'));
        $show->field('feeNumber', __('费用数量'));
        $show->field('useReason', __('使用理由'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>