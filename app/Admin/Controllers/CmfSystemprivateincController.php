<?php

namespace App\Admin\Controllers;

use App\Models\CmfSystemprivateinc;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSystemprivateincController extends AdminController {

	protected $title = "系统隐私设置";

    public function index(Content $content)
    {
        return $content
            ->header('系统隐私设置')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSystemprivateinc());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('FILE', __('文件'));
                $grid->column('MODULE', __('模块'));
                $grid->column('DEPT_ID', __('部门ID'));
                $grid->column('DEPT_NAME', __('部门名称'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSystemprivateinc());
                $form->text('FILE', __('文件'))
                ->creationRules('required|max:200|unique:cmf_systemprivateinc',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('MODULE', __('模块'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('DEPT_ID', __('部门ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('DEPT_NAME', __('部门名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('ROLE_ID', __('角色ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('ROLE_NAME', __('角色名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('USER_ID', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('USER_NAME', __('用户名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统隐私设置');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统隐私设置')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSystemprivateinc());
        return $content
            ->header('系统隐私设置')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSystemprivateinc::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('FILE', __('文件'));
        $show->field('MODULE', __('模块'));
        $show->field('DEPT_ID', __('部门ID'));
        $show->field('DEPT_NAME', __('部门名称'));
        $show->field('ROLE_ID', __('角色ID'));
        $show->field('ROLE_NAME', __('角色名称'));
        $show->field('USER_ID', __('用户ID'));
        $show->field('USER_NAME', __('用户名称'));
        return $show;
        }
}

?>