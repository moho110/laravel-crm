<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengTiaoxiububan;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengTiaoxiububanController extends AdminController {

	protected $title = "行政调休补班";

    public function index(Content $content)
    {
        return $content
            ->header('行政调休补班')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengTiaoxiububan());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('term', __('学期'));
                $grid->column('department', __('部门'));
                $grid->column('person', __('人员'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengTiaoxiububan());
                $form->number('term', __('学期'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_tiaoxiububan',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('department', __('部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('person', __('人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('tiaoxiuTime', __('调休时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('tiaoxiuStart', __('调休上班'))
                ->creationRules('required|max:10',
                        ['required' => '此项不能为空','max' =>'不能大于10个字符']);
                $form->date('bubanTime', __('补班时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('bubanStart', __('补班上班'))
                ->creationRules('required|max:10',
                        ['required' => '此项不能为空','max' =>'不能大于10个字符']);
                $form->radio('tiaoxiuExStatus', __('调休审核状态'))->options(['1' => '良好','0'=> '一般'])
                ->rules('required');
                $form->text('tiaoxiuWorkFlowID', __('调休工作流ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('tiaoxiuExMan', __('调休审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('tiaoxiuExTime', __('调休审核时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->radio('bubanExStatus', __('补班审核状态'))->options(['1' => '良好','0' => '一般'])
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('bubanWorkFlowID', __('补班工作流ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('bubanExMan', __('补班审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('bubanExTime', __('补班审核时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('personName', __('人员名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政调休补班');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政调休补班')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengTiaoxiububan());
        return $content
            ->header('行政调休补班')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengTiaoxiububan::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('term', __('学期'));
        $show->field('department', __('部门'));
        $show->field('person', __('人员'));
        $show->field('tiaoxiuTime', __('调休时间'));
        $show->field('tiaoxiuStart', __('调休上班'));
        $show->field('bubanTime', __('补班时间'));
        $show->field('bubanStart', __('补班上班'));
        $show->field('tiaoxiuExStatus', __('调休审核状态'));
        $show->field('tiaoxiuWorkFlowID', __('调休工作流ID'));
        $show->field('tiaoxiuExMan', __('调休审核人'));
        $show->field('tiaoxiuExTime', __('调休审核人'));
        $show->field('bubanExStatus', __('补班审核状态'));
        $show->field('bubanWorkFlowID', __('补班工作流ID'));
        $show->field('bubanExMan', __('补班审核人'));
        $show->field('bubanExTime', __('补班审核时间'));
        $show->field('personName', __('人员名称'));
        return $show;
        }
}

?>