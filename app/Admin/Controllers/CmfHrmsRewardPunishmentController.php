<?php

namespace App\Admin\Controllers;

use App\Models\CmfHrmsRewardPunishment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfHrmsRewardPunishmentController extends AdminController {

	protected $title = "人员奖惩";

    public function index(Content $content)
    {
        return $content
            ->header('人员奖惩')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfHrmsRewardPunishment());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('workId', __('工号'));
                $grid->column('name', __('名称'));
                $grid->column('inDepartment', __('所在部门'));
                $grid->column('punishmentName', __('惩罚名称'));
                $grid->column('approvalMan', '批准人');
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfHrmsRewardPunishment());
                $form->text('type', __('类型'))
                ->creationRules('required|max:200|unique:cmf_hrms_reward_punishment',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->radio('status', __('状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                $form->text('workId', __('工号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('name', __('名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('inDepartment', __('所在部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('punishmentName', __('奖惩名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('punishmentReason', __('奖惩理由'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('punishmentContent', __('奖惩内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('approvalDep', __('批准部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('approvalMan', __('批准人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('approvalTime', __('批准时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->date('shengxiaobyDate', __('生效日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('cancelTime', __('取消时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('cancelReason', __('取消理由'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('人员奖惩');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('人员奖惩')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfHrmsRewardPunishment());
        return $content
            ->header('人员奖惩')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfHrmsRewardPunishment::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('type', __('类型'));
        $show->field('status', __('状态'));
        $show->field('workId', __('工号'));
        $show->field('name', __('名称'));
        $show->field('inDepartment', __('所在部门'));
        $show->field('punishmentName', __('奖惩名称'));
        $show->field('punishmentReason', __('奖惩理由'));
        $show->field('punishmentContent', __('奖惩内容'));
        $show->field('approvalDep', __('批准部门'));
        $show->field('approvalMan', __('批准人'));
        $show->field('approvalTime', __('批准时间'));
        $show->field('shengxiaobyDate', __('生效日期'));
        $show->field('memo', __('备注'));
        $show->field('cancelTime', __('取消时间'));
        $show->field('cancelReason', __('取消理由'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>