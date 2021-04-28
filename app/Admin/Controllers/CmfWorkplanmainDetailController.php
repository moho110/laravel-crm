<?php

namespace App\Admin\Controllers;

use App\Models\CmfWorkplanmainDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfWorkplanmainDetailController extends AdminController {

	protected $title = "任务执行";

    public function index(Content $content)
    {
        return $content
            ->header('任务执行')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfWorkplanmainDetail());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('mainrowid', __('主行ID'));
                $grid->column('begintime', __('开始时间'));
                $grid->column('endtime', __('结束时间'));
                $grid->column('result', __('结果'));
                $grid->column('fujian', '附件');
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfWorkplanmainDetail());
                $form->text('mainrowid', __('主行ID'))
                ->creationRules('required|max:200|unique:cmf_workplanmain_detail',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('begintime', __('开始时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('endtime', __('结束时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('content', __('内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('result', __('结果'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('nexttime', __('下次时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->textarea('nextcontent', __('下次内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('fujian', __('附件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('任务执行');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('任务执行')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfWorkplanmainDetail());
        return $content
            ->header('任务执行')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfWorkplanmainDetail::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('mainrowid', __('主行ID'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('begintime', __('开始时间'));
        $show->field('endtime', __('结束时间'));
        $show->field('content', __('内容'));
        $show->field('result', __('结果'));
        $show->field('nexttime', __('下次时间'));
        $show->field('nextcontent', __('下次内容'));
        $show->field('fujian', __('附件'));
        return $show;
        }
}

?>