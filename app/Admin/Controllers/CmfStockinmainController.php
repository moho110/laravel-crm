<?php

namespace App\Admin\Controllers;

use App\Models\CmfStockinmain;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfStockinmainController extends AdminController {

	protected $title = "入库单";

    public function index(Content $content)
    {
        return $content
            ->header('入库单')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfStockinmain());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('zhuti', __('主题'));
                $grid->column('storeid', __('库存ID'));
                $grid->column('indate', __('入库日期'));
                $grid->column('caigoubillid', __('采购清单ID'));
                $grid->column('tuihuobillid', '退货清单ID');
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfStockinmain());
                $form->text('zhuti', __('主题'))
                ->creationRules('required|max:200|unique:cmf_stockinmain',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('storeid', __('库存ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('indate', __('入库日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('caigoubillid', __('采购清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('tuihuobillid', __('退货清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('state', __('状态'))->options(['1' => '良好','0' => '一般'])
                ->rules('required');
                $form->textarea('beiyong1', __('备用一'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beiyong2', __('备用二'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beiyong3', __('备用三'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('totalnum', __('总数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('totalmoney', __('总金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('instoreshenhe', __('入库审核'))->options(['1' => '已审核','0' => '未审核'])
                ->rules('required');
                $form->radio('intype', __('入库类型'))->options(['1' => '生产入库','2' => '采购入库','3' => '其他入库'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('入库单');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('入库单')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfStockinmain());
        return $content
            ->header('入库单')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfStockinmain::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('zhuti', __('主题'));
        $show->field('storeid', __('库存ID'));
        $show->field('indate', __('入库日期'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('caigoubillid', __('采购清单ID'));
        $show->field('tuihuobillid', __('退货清单ID'));
        $show->field('memo', __('备注'));
        $show->field('state', __('状态'));
        $show->field('beiyong1', __('备用一'));
        $show->field('beiyong2', __('备用二'));
        $show->field('beiyong3', __('备用三'));
        $show->field('totalnum', __('总数量'));
        $show->field('totalmoney', __('总金额'));
        $show->field('instoreshenhe', __('入库审核'));
        $show->field('intype', __('入库类型'));
        return $show;
        }
}

?>