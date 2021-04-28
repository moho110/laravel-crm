<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengWorkCheckRegister;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengWorkCheckRegisterController extends AdminController {

	protected $title = "行政人员工作考核登记表";

    public function index(Content $content)
    {
        return $content
            ->header('行政人员工作考核登记表')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengWorkCheckRegister());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('schoolName', __('学校名称'));
                $grid->column('fillDate', __('填表日期'));
                $grid->column('workFlow', __('工作流'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengWorkCheckRegister());
                $form->text('schoolName', __('学校名称'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_work_check_register',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('studyYear', __('学年'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('name', __('姓名'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('userName', __('用户名'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('classRoom', __('科室'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staff', __('职务'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('fillDate', __('填表日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('dutyAndYearObj', __('岗位职责与年度目标任务'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('personSummary', __('个人总结'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('personSySign', __('个人总结签字签章'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('personSySignDate', __('个人总结签字签章日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('recentYearPunishThings', __('当年奖惩情况'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('classRoomIdeal', __('科室测评意见'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('rankandLevel', __('科室测评考核等级'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('classRoomSign', __('科室签字签章'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('classRoomDate', __('科室测评意见日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('schoolOpinion', __('学校考核小组意见'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('ExLeaderGroupSign', __('学校考核领导小组签字签章'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('ExLeaderGroupSignDate', __('学校考核小组意见日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('personOpinion', __('本人意见'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('personSign', __('本人签章'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('personOpinionDate', __('本人意见日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('workFlow', __('工作流'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('行政人员工作考核登记表');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('行政人员工作考核登记表')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengWorkCheckRegister());
        return $content
            ->header('行政人员工作考核登记表')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengWorkCheckRegister::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('schoolName', __('模块编号'));
        $show->field('moduleName', __('模块名称'));
        $show->field('modulePosition', __('模块位置'));
        $show->field('moduleAttr', __('模块属性'));
        $show->field('displayLineNumber', __('显示行号'));
        $show->field('scrollDisplay', __('是否滚动显示'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('memo', __('备注'));
        $show->field('id', __('编号'));
        $show->field('moduleId', __('模块编号'));
        $show->field('moduleName', __('模块名称'));
        $show->field('modulePosition', __('模块位置'));
        $show->field('moduleAttr', __('模块属性'));
        $show->field('displayLineNumber', __('显示行号'));
        $show->field('scrollDisplay', __('是否滚动显示'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('memo', __('备注'));
        $show->field('id', __('编号'));
        $show->field('moduleId', __('模块编号'));
        $show->field('moduleName', __('模块名称'));
        $show->field('modulePosition', __('模块位置'));
        $show->field('moduleAttr', __('模块属性'));
        $show->field('displayLineNumber', __('显示行号'));
        $show->field('scrollDisplay', __('是否滚动显示'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>