<?php

namespace App\Admin\Controllers;

use App\Models\CmfSystemLog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSystemLogController extends AdminController {

	protected $title = "系统日志管理";

    public function index(Content $content)
    {
        return $content
            ->header('系统日志管理')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSystemLog());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('loginaction', __('登陆动作'));
                $grid->column('DATE', __('日期'));
                $grid->column('REMOTE_ADDR', __('远程地址'));
                $grid->column('SCRIPT_NAME', __('脚本名称'));
                $grid->column('USERID', '用户ID');
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSystemLog());
                $form->text('loginaction', __('登陆动作'))
                ->creationRules('required|max:200|unique:cmf_system_log',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->datetime('DATE', __('日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->url('REMOTE_ADDR', __('远程地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('HTTP_USER_AGENT', __('用户代理'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('QUERY_STRING', __('查询字串'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('SCRIPT_NAME', __('脚本名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('USERID', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('SQLTEXT', __('SQLTEXT'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统日志管理');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统日志管理')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSystemLog());
        return $content
            ->header('系统日志管理')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSystemLog::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('loginaction', __('登陆动作'));
        $show->field('DATE', __('日期'));
        $show->field('REMOTE_ADDR', __('远程地址'));
        $show->field('HTTP_USER_AGENT', __('用户代理'));
        $show->field('QUERY_STRING', __('查询字串'));
        $show->field('SCRIPT_NAME', __('脚本名称'));
        $show->field('USERID', __('用户ID'));
        $show->field('SQLTEXT', __('SQLTEXT'));
        return $show;
        }
}

?>