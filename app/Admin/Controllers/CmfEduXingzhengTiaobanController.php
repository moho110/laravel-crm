<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengTiaoban;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengTiaobanController extends AdminController {

	protected $title = "行政调班";

    public function index(Content $content)
    {
        return $content
            ->header('行政调班')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengTiaoban());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('term', __('学期'));
                $grid->column('department', __('部门'));
                $grid->column('person', __('人员'));
                $grid->column('exMan', __('审核人'));
                $grid->column('exTime', __('审核时间'));
                $grid->column('personName', __('人员姓名'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengTiaoban());
                $form->number('term', __('学期'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_tiaoban',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('department', __('部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('person', __('人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('oriStartTime', __('原上班时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('oriStart', __('原上班'))
                ->creationRules('required|max:10',
                        ['required' => '此项不能为空','max' =>'不能大于10个字符']);
                $form->date('newStartTime', __('新上班时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->date('newStart', __('新上班'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->radio('exStatus', __('审核状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                $form->text('workFlowID', __('工作流ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('exMan', __('审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('exTime', __('审核时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('personName', __('人员姓名'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政调班');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政调班')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengTiaoban());
        return $content
            ->header('行政调班')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengTiaoban::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('term', __('学期'));
        $show->field('department', __('部门'));
        $show->field('person', __('人员'));
        $show->field('oriStartTime', __('原上班时间'));
        $show->field('oriStart', __('原上班'));
        $show->field('newStartTime', __('新上班时间'));
        $show->field('newStart', __('新上班'));
        $show->field('exStatus', __('审核状态'));
        $show->field('workFlowID', __('工作流ID'));
        $show->field('exMan', __('审核人'));
        $show->field('exTime', __('审核时间'));
        $show->field('personName', __('人员姓名'));
        return $show;
        }
}

?>