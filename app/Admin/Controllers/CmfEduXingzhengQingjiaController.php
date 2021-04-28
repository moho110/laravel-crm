<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengQingjia;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengQingjiaController extends AdminController {

	protected $title = "行政请假";

    public function index(Content $content)
    {
        return $content
            ->header('行政请假')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengQingjia());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('term', __('学期'));
                $grid->column('department', __('部门'));
                $grid->column('person', __('人员'));
                $grid->column('exMan', __('审核人'));
                $grid->column('exTime', __('审核时间'));
                $grid->column('personName', __('人员名称'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengQingjia());
                $form->text('term', __('学期'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_qingjia',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('department', __('部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('person', __('人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('time', __('时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->number('week', __('周次'))
                ->creationRules('required|max:200',['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('class', __('班次'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('qingjiaType', __('请假类型'))->options(['1' => '一般','0' => '严重'])
                ->rules('required');
                $form->radio('exStatus', __('审核状态'))->options(['1' => '良好','0' => '不好'])
                ->rules('required');
                $form->text('workFlowID', __('工作流ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('exMan', __('审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('exTime', __('审核时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('personName', __('人员名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政请假');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政请假')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengQingjia());
        return $content
            ->header('行政请假')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengQingjia::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('term', __('学期'));
        $show->field('department', __('部门'));
        $show->field('person', __('人员'));
        $show->field('time', __('时间'));
        $show->field('week', __('周次'));
        $show->field('class', __('班次'));
        $show->field('qingjiaType', __('请假类型'));
        $show->field('exStatus', __('审核状态'));
        $show->field('workFlowID', __('工作流ID'));
        $show->field('exMan', __('审核人'));
        $show->field('exTime', __('审核时间'));
        $show->field('personName', __('人员名称'));
        return $show;
        }
}

?>