<?php

namespace App\Admin\Controllers;

use App\Models\CmfDepartment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfDepartmentController extends AdminController {

	protected $title = "部门管理";

    public function index(Content $content)
    {
        return $content
            ->header('部门管理')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfDepartment());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('DEPT_NAME', __('部门名称'));
                $grid->column('TEL_NO', __('电话号码'));
                $grid->column('FAX_NO', __('传真号码'));
                $grid->column('DEPT_NO', __('部门编号'));
                $grid->column('DEPT_FUNC', '部门职能');
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfDepartment());
                $form->text('DEPT_NAME', __('部门名称'))
                ->creationRules('required|max:200|unique:cmf_department',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('TEL_NO', __('电话号码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于500个字符']);
                $form->text('FAX_NO', __('传真号码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于500个字符']);
                $form->text('DEPT_NO', __('部门编号'))
                ->creationRules('required|max:200|integer',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('DEPT_PARENT', __('上级部门'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('MANAGER', __('部门经理'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('LEADER1', __('领导一'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('LEADER2', __('领导二'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('DEPT_FUNC', __('部门职能'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('orderno', __('编号'))
                ->creationRules('required|max:200|integer',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('部门管理');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('部门管理')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfDepartment());
        return $content
            ->header('部门管理')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfDepartment::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('DEPT_NAME', __('部门名称'));
        $show->field('TEL_NO', __('电话号码'));
        $show->field('FAX_NO', __('传真号码'));
        $show->field('DEPT_NO', __('部门编号'));
        $show->field('DEPT_PARENT', __('上级部门'));
        $show->field('MANAGER', __('部门经理'));
        $show->field('LEADER1', __('领导一'));
        $show->field('LEADER2', __('领导二'));
        $show->field('DEPT_FUNC', __('部门职能'));
        $show->field('orderno', __('编号'));
        return $show;
        }
}

?>