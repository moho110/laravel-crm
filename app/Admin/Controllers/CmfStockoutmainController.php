<?php

namespace App\Admin\Controllers;

use App\Models\CmfStockoutmain;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfStockoutmainController extends AdminController {

	protected $title = "出库单";

    public function index(Content $content)
    {
        return $content
            ->header('出库单')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfStockoutmain());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('zhuti', __('主题'));
                $grid->column('storeid', __('库存ID'));
                $grid->column('state', __('状态'));
                $grid->column('totalnum', __('总数'));
                $grid->column('totalmoney', '总金额');
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfStockoutmain());
                $form->text('zhuti', __('主题'))
                ->creationRules('required|max:200|unique:cmf_stockoutmain',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('storeid', __('存库ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->radio('state', __('状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                $form->currency('totalnum', __('总数'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('totalmoney', __('总金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('dingdanbillid', __('订单清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('outdate', __('出库日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->radio('outstoreshenhe', __('出库审核'))->options(['1' => '已审核','0' => '未审核'])
                ->rules('required');
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('outtype', __('出库类型'))->options(['1' => '普通','0' => '特殊'])
                ->rules('required');
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('出库单');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('出库单')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfStockoutmain());
        return $content
            ->header('出库单')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfStockoutmain::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('zhuti', __('主题'));
        $show->field('storeid', __('库存ID'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('state', __('状态'));
        $show->field('totalnum', __('总数'));
        $show->field('totalmoney', __('总金额'));
        $show->field('dingdanbillid', __('订单清单ID'));
        $show->field('outdate', __('出库日期'));
        $show->field('outstoreshenhe', __('出库审核'));
        $show->field('memo', __('备注'));
        $show->field('outtype', __('出库类型'));
        return $show;
        }
}

?>