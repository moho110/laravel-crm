<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduXingzhengKaoqinmingxi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduXingzhengKaoqinmingxiController extends AdminController {

	protected $title = "考勤明细";

    public function index(Content $content)
    {
        return $content
            ->header('考勤明细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduXingzhengKaoqinmingxi());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('term', __('学期'));
                $grid->column('department', __('部门'));
                $grid->column('person', __('人员'));
                $grid->column('createTime', __('创建时间'));
                $grid->column('personName', '人员姓名');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduXingzhengKaoqinmingxi());
                $form->number('term', __('学期'))
                ->creationRules('required|max:200|unique:cmf_edu_xingzheng_kaoqinmingxi',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('department', __('部门'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('person', __('人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('date', __('日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('week', __('周次'))
                ->creationRules('required|max:200|integer',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('day', __('星期'))
                ->creationRules('required|max:4',
                        ['required' => '此项不能为空','max' =>'不能大于4个字符']);
                $form->text('class', __('班次'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('startRealityCard', __('上班实际打卡'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('startKaoqinStatus', __('上班考勤状态'))->options(['1' => '良好','0' =>'一般'])
                ->rules('required');
                $form->text('endRealityCard', __('下班实际打卡'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('endKaoqinStatus', __('下班考勤状态'))->options(['1' => '良好','0' =>'一般'])
                ->rules('required');
                $form->text('startCardBGN', __('上班打卡BGN'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('startCardEND', __('上班打卡END'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('endCartBGN', __('下班打卡BGN'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('endCardEND', __('下班打卡END'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('startDelayTime', __('上班迟到时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('delayMinutesNum', __('迟到分钟次数'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('delayQuitTime', __('下班早退时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('earlyQuitMinutesNum', __('早退分钟次数'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('personName', __('人员名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('考勤明细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('考勤明细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduXingzhengKaoqinmingxi());
        return $content
            ->header('考勤明细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduXingzhengKaoqinmingxi::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('term', __('学期'));
        $show->field('department', __('部门'));
        $show->field('person', __('人员'));
        $show->field('date', __('日期'));
        $show->field('week', __('周次'));
        $show->field('day', __('星期'));
        $show->field('class', __('班次'));
        $show->field('startRealityCard', __('上班实际打卡'));
        $show->field('startKaoqinStatus', __('上班考勤状态'));
        $show->field('endRealityCard', __('下班实际打卡'));
        $show->field('endKaoqinStatus', __('下班考勤状态'));
        $show->field('startCardBGN', __('上班打卡BGN'));
        $show->field('startCardEND', __('上班打卡END'));
        $show->field('endCartBGN', __('下班打卡BGN'));
        $show->field('endCardEND', __('下班打卡END'));
        $show->field('startDelayTime', __('上班迟到时间'));
        $show->field('delayMinutesNum', __('迟到分钟次数'));
        $show->field('delayQuitTime', __('迟到时间'));
        $show->field('earlyQuitMinutesNum', __('早退分钟次数'));
        $show->field('createTime', __('创建时间'));
        $show->field('personName', __('人员名称'));
        return $show;
        }
}

?>