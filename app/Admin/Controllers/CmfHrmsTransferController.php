<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsTransfer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsTransferController extends AdminController {

	protected $title = "转职明细";

    public function index(Content $content)
    {
        return $content
            ->header('转职明细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsTransfer());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('workId', __('工号'));
                $grid->column('name', __('姓名'));
                $grid->column('transferDate', __('转职日期'));
                $grid->column('inDepartment', __('所在部门'));
                $grid->column('staffMan', '经办人');
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsTransfer());
                $form->text('workId', __('工号'))
                ->creationRules('required|max:200|unique:cmf_hrms_transfer',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('name', __('名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('transferDate', __('转职日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('inDepartment', __('所在部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('afterDep', __('转后部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('beforeStaff', __('之前职位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('afterStaff', __('之后职位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('beforegangwei', __('之前岗位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('aftergangwei', __('之后岗位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('transferReason', __('转职理由'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staffMan', __('职员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('jobsSituation', __('工作场合'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('transferType', __('转职类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('creatTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('转职明细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('转职明细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsTransfer());
        return $content
            ->header('转职明细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsTransfer::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('workId', __('工号'));
        $show->field('name', __('名称'));
        $show->field('transferDate', __('转职日期'));
        $show->field('inDepartment', __('所在部门'));
        $show->field('afterDep', __('转后部门'));
        $show->field('beforeStaff', __('之前职位'));
        $show->field('afterStaff', __('之后职位'));
        $show->field('beforegangwei', __('之前岗位'));
        $show->field('aftergangwei', __('之后岗位'));
        $show->field('transferReason', __('转职理由'));
        $show->field('staffMan', __('职员'));
        $show->field('memo', __('备注'));
        $show->field('jobsSituation', __('工作场合'));
        $show->field('transferType', __('转职类型'));
        $show->field('creator', __('创建人'));
        $show->field('creatTime', __('创建时间'));
        return $show;
        }
}

?>