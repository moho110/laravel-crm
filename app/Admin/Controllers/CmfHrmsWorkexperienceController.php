<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsWorkexperience;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsWorkexperienceController extends AdminController {

	protected $title = "工作经验";

    public function index(Content $content)
    {
        return $content
            ->header('工作经验')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsWorkexperience());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('workId', __('工号'));
                $grid->column('name', __('名称'));
                $grid->column('inDepartment', __('所在部门'));
                $grid->column('startTime', __('开始时间'));
                $grid->column('endTime', '结束时间');
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsWorkexperience());
                $form->text('workId', __('工号'))
                ->creationRules('required|max:2|unique:cmf_hrms_workexperience',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符','unique' => '数据已经存在']);
                $form->text('name', __('名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('inDepartment', __('所在部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('startTime', __('开始时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->date('endTime', __('结束时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('company', __('公司'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('department', __('部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('staff', __('职位'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->text('proveMan', __('证明人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('quitReason', __('辞职理由'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('工作经验');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('工作经验')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsWorkexperience());
        return $content
            ->header('工作经验')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsWorkexperience::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('workId', __('工号'));
        $show->field('name', __('名称'));
        $show->field('inDepartment', __('所在部门'));
        $show->field('startTime', __('开始时间'));
        $show->field('endTime', __('结束时间'));
        $show->field('company', __('公司'));
        $show->field('department', __('部门'));
        $show->field('staff', __('职位'));
        $show->field('proveMan', __('证明人'));
        $show->field('memo', __('备注'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('quitReason', __('辞职理由'));
        return $show;
        }
}

?>