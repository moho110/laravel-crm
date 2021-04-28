<?php

namespace App\Admin\Controllers;

use App\Models\CmfDepartment;
use App\Models\CmfEduXingzhengJiabanbuxiu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengJiabanbuxiuController extends AdminController {

	protected $title = "行政加班补休";

    public function index(Content $content)
    {
        return $content
            ->header('行政加班补休')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengJiabanbuxiu());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('term', __('学期'));
                $grid->column('DEPT_NAME', __('部门'))->display(function (){
                    return $this->CmfDepartment['DEPT_NAME'];});
                $grid->column('person', __('人员'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengJiabanbuxiu());
                $form->number('term', __('学期'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_jiabanbuxiu',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('department', __('部门'))
                ->options(CmfDepartment::pluck('DEPT_NAME','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('person', __('人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('delayWorkTime', __('延迟工作时间'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->text('delayWorkNum', __('延迟工作次数'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('buxiuTime', __('补休时间'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->text('buxiuClass', __('补休班次'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('delayWorkStatus', __('延迟工作状态'))->options(['1' => '良好','0' => '不好'])
                ->rules('required');
                $form->textarea('delayWorkID', __('延迟工作ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('delayWorkMan', __('延迟工作人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('delayWorkExTime', __('延迟工作审核时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->radio('buxiuStatus', __('补休状态'))->options(['1' => '良好','0' => '不好'])
                ->rules('required');
                $form->text('buxiuFlowId', __('补休工作流'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('buxiuExMan', __('补休审核人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('buxiuExTime', __('补休审核时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('personName', __('人员名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政加班补休');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政加班补休')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengJiabanbuxiu());
        return $content
            ->header('行政加班补休')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengJiabanbuxiu::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('term', __('学期'));
        $show->field('DEPT_NAME', __('部门'))->as(function ($CmfDepartment) {
                return $this->CmfDepartment['DEPT_NAME'];
            });
        $show->field('person', __('人员'));
        $show->field('delayWorkTime', __('延迟工作时间'));
        $show->field('delayWorkNum', __('延迟工作次数'));
        $show->field('buxiuTime', __('补休时间'));
        $show->field('buxiuClass', __('补休班次'));
        $show->field('delayWorkStatus', __('延迟工作状态'));
        $show->field('delayWorkID', __('延迟工作ID'));
        $show->field('delayWorkMan', __('延迟工作人'));
        $show->field('delayWorkExTime', __('延迟工作审核时间'));
        $show->field('buxiuStatus', __('补休状态'));
        $show->field('buxiuFlowId', __('补休工作流ID'));
        $show->field('buxiuExMan', __('补休审核人'));
        $show->field('buxiuExTime', __('补休审核时间'));
        $show->field('personName', __('人员名称'));
        return $show;
        }
}

?>