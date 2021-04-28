<?php

namespace App\Admin\Controllers;

use App\Models\CmfCalendar;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCalendarController extends AdminController {

	protected $title = "日程安排";

    public function index(Content $content)
    {
        return $content
            ->header('日程安排')
            ->description('列表')
            ->body($this->grid());
    }

    protected function grid() {
                $grid = new Grid(new CmfCalendar());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('USER_ID', __('用户编号'));
                $grid->column('tixingtime', __('提醒时间'));
                $grid->column('url', __('url地址'));
                $grid->paginate(10);
                return $grid;
        }

    public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('日程安排');
            $content->description('新增');
            $content->body($this->form());
            });
        }

    protected function form()
        {
                $form = new Form(new CmfCalendar());
                $form->number('USER_ID', __('用户编号'))
                ->creationRules('required|max:2|unique:cmf_calendar',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符','unique' => '数据已经存在']);
                $form->datetime('CAL_TIME', __('日程时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('END_TIME', __('结束时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->number('CAL_TYPE', __('日程类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('CAL_LEVEL', __('日程等级'))
                ->creationRules('required|max:2|unique:cmf_calendar',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符','unique' => '数据已经存在']);
                $form->radio('ifsms', __('是否发送短信'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->number('MANAGER_ID', __('管理员ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('OVER_STATUS', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->datetime('tixingtime', __('提醒时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('url', __('url地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符'])->rules('required');
                $form->text('guanlianid', __('关联ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
                $form->textarea('CONTENT', __('内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

    public function show($id, Content $content)
        {
        return $content
            ->header('日程安排')
            ->description('详情')
            ->body($this->detail($id));
        }

    public function edit($id, Content $content)
        {
            $form = new Form(new CmfCalendar());
        return $content
            ->header('日程安排')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

    protected function detail($id)
        {
        $show = new Show(CmfCalendar::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('USER_ID', __('用户编号'));
        $show->field('CAL_TIME', __('日程时间'));
        $show->field('END_TIME', __('结束时间'));
        $show->field('CAL_TYPE', __('日程类型'));
        $show->field('CAL_LEVEL', __('日程等级'));
        $show->field('MANAGER_ID', __('管理员ID'));
        $show->field('OVER_STATUS', __('状态'));
        $show->field('ifsms', __('是否发送短信'));
        $show->field('tixingtime', __('提醒时间'));
        $show->field('url', __('url地址'));
        $show->field('guanlianid', __('关联ID'));
        $show->field('CONTENT', __('内容'));
        return $show;
        }
        
}

?>