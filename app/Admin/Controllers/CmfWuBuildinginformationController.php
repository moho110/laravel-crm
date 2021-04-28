<?php

namespace App\Admin\Controllers;

use App\Models\CmfWuBuildinginformation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfWuBuildinginformationController extends AdminController {

	protected $title = "大楼资料";

    public function index(Content $content)
    {
        return $content
            ->header('大楼资料')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfWuBuildinginformation());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('buildingNo', __('楼层编号'));
                $grid->column('buildingName', __('楼层名称'));
                $grid->column('buildingLocate', __('楼层位置'));
                $grid->column('unit', __('单元'));
                $grid->column('buildingStruct', '楼体结构');
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfWuBuildinginformation());
                $form->text('buildingNo', __('大楼编号'))
                ->creationRules('required|max:200|unique:cmf_wu_buildinginformation',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('buildingName', __('大楼名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('buildingLocate', __('大楼位置'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('unit', __('单元'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('buildingStruct', __('大楼结构'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('type', __('类型'))->options(['1' => '住宅','0' => '其他'])
                ->rules('required');
                $form->text('sum', __('总数'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('startDate', __('开始日期'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->datetime('finishDate', __('完成日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('jiaofuDate', __('交付日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->radio('useIn', __('使用'))->options(['1' => '普通住宅','0' => '商用住宅'])
                ->rules('required');
                $form->text('area', __('面积'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('saledNum', __('销售数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('rentNum', __('租用数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('builder', __('开发商'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('optManage', __('操作管理'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('areaName', __('区域名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('大楼资料');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('大楼资料')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfWuBuildinginformation());
        return $content
            ->header('大楼资料')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfWuBuildinginformation::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('buildingNo', __('大楼编号'));
        $show->field('buildingName', __('大楼名称'));
        $show->field('buildingLocate', __('大楼位置'));
        $show->field('unit', __('单元'));
        $show->field('buildingStruct', __('大楼结构'));
        $show->field('type', __('类型'));
        $show->field('sum', __('总数'));
        $show->field('startDate', __('开始日期'));
        $show->field('finishDate', __('完成日期'));
        $show->field('jiaofuDate', __('交付日期'));
        $show->field('useIn', __('使用'));
        $show->field('area', __('面积'));
        $show->field('saledNum', __('销售数量'));
        $show->field('rentNum', __('租用数量'));
        $show->field('builder', __('开发商'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        $show->field('memo', __('备注'));
        $show->field('optManage', __('操作管理'));
        $show->field('areaName', __('区域名称'));
        return $show;
        }
}

?>