<?php

namespace App\Admin\Controllers;

use App\Models\CmfProductzuzhuang;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfProductzuzhuangController extends AdminController {

	protected $title = "产品组装";

    public function index(Content $content)
    {
        return $content
            ->header('产品组装')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfProductzuzhuang());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('zhuti', __('主题'));
                $grid->column('outstoreid', __('出库ID'));
                $grid->column('instoreid', __('入库ID'));
                $grid->column('totalmoney', __('总金额'));
                $grid->column('state', '状态');
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfProductzuzhuang());
                $form->text('zhuti', __('主题'))
                ->creationRules('required|max:200|unique:cmf_productzuzhuang',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('outstoreid', __('出库ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('instoreid', __('入库ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->currency('totalmoney', __('总金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('state', __('状态'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('outstoreshenhe', __('出库审核'))->options(['1' => '已审核','0' => '未审核'])
                ->rules('required');
                $form->radio('instoreshenhe', __('入库审核'))->options(['1' => '已审核','0' => '未审核'])
                ->rules('required');
                $form->datetime('outshenhetime', __('出库时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->datetime('inshenhetime', __('入库时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('产品组装');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('产品组装')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfProductzuzhuang());
        return $content
            ->header('产品组装')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfProductzuzhuang::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('zhuti', __('主题'));
        $show->field('outstoreid', __('出库ID'));
        $show->field('instoreid', __('入库ID'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('totalmoney', __('总金额'));
        $show->field('state', __('状态'));
        $show->field('outstoreshenhe', __('出库审核'));
        $show->field('instoreshenhe', __('入库审核'));
        $show->field('outshenhetime', __('出库时间'));
        $show->field('inshenhetime', __('入库时间'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>