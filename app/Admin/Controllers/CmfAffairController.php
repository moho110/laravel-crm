<?php

namespace App\Admin\Controllers;

use App\Models\CmfAffair;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfAffairController extends AdminController {

	protected $title = "事务";

    public function index(Content $content)
    {
        return $content
            ->header('事务')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfAffair());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('USER_ID', __('用户ID'));
                $grid->column('BEGIN_TIME', __('开始时间'));
                $grid->column('END_TIME', __('结束时间'));
                $grid->column('TYPE', __('事务类型'));
                $grid->column('MANAGER_ID', '管理员ID');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfAffair());
                $form->text('USER_ID', __('用户ID'))
                ->creationRules('required|max:200|unique:cmf_affair',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->datetime('BEGIN_TIME', __('开始时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('END_TIME', __('结束时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('TYPE', __('事务类型'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('REMIND_DATE', __('提醒日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('REMIND_TIME', __('提醒时间'))
                ->creationRules('required', ['required' => '提醒时间不能为空']);
                $form->textarea('CONTENT', __('事务内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('LAST_REMIND', __('最后提醒日期'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->text('SMS2_REMIND', __('短信提醒'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('LAST_SMS2_REMIND', __('最后短信提醒'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('MANAGER_ID', __('管理员ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('事务');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('事务')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfAffair());
        return $content
            ->header('事务')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfAffair::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('USER_ID', __('用户ID'));
        $show->field('BEGIN_TIME', __('开始时间'));
        $show->field('END_TIME', __('结束时间'));
        $show->field('TYPE', __('事务类型'));
        $show->field('REMIND_DATE', __('提醒日期'));
        $show->field('REMIND_TIME', __('提醒时间'));
        $show->field('CONTENT', __('事务内容'));
        $show->field('LAST_REMIND', __('最后提醒'));
        $show->field('SMS2_REMIND', __('短信提醒'));
        $show->field('LAST_SMS2_REMIND', __('最后短信提醒'));
        $show->field('MANAGER_ID', __('管理员ID'));
        return $show;
        }
}

?>