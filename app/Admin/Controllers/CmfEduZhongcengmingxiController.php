<?php

namespace App\Admin\Controllers;

use App\Models\CmfEduZhongcengmingxi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfEduZhongcengmingxiController extends AdminController {

	protected $title = "中层干部测评内容明细";

    public function index(Content $content)
    {
        return $content
            ->header('中层干部测评内容明细')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfEduZhongcengmingxi());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('testName', __('测试名称'));
                $grid->column('staff', __('职务'));
                $grid->column('PingjiaMan', __('评价人'));
                $grid->column('pingjiaTime', __('评价时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfEduZhongcengmingxi());
                $form->text('testName', __('测评名称'))
                ->creationRules('required|max:200|unique:cmf_edu_zhongcengmingxi',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('testManBy', __('被评人员'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('uit', __('单位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('staff', __('职务'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('pindeEvl', __('品德评价'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('pindeMemo', __('品德备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('abillityPingjia', __('能力评价'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('abillityMemo', __('能力备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('studyPingjia', __('勤奋评价'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('studyMemo', __('勤奋备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('jixiaoPingjia', __('绩效评价'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('jixiaoMemo', __('绩效备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('lianzhengPingjia', __('廉政评价'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('lianzhengMemo', __('廉政备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('PingjiaMan', __('评价人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('pingjiaTime', __('评价时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('中层干部测评内容明细');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('中层干部测评内容明细')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfEduZhongcengmingxi());
        return $content
            ->header('中层干部测评内容明细')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfEduZhongcengmingxi::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('testName', __('测评名称'));
        $show->field('testManBy', __('被评人员'));
        $show->field('uit', __('单位'));
        $show->field('staff', __('职务'));
        $show->field('pindeEvl', __('品德评价'));
        $show->field('pindeMemo', __('品德备注'));
        $show->field('abillityPingjia', __('能力评价'));
        $show->field('abillityMemo', __('能力备注'));
        $show->field('studyPingjia', __('勤奋评价'));
        $show->field('studyMemo', __('勤奋备注'));
        $show->field('jixiaoPingjia', __('绩效评价'));
        $show->field('jixiaoMemo', __('绩效备注'));
        $show->field('lianzhengPingjia', __('廉政评价'));
        $show->field('lianzhengMemo', __('廉政备注'));
        $show->field('PingjiaMan', __('评价人'));
        $show->field('pingjiaTime', __('评价时间'));
        return $show;
        }
}

?>