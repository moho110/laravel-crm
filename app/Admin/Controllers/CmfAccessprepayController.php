<?php

namespace App\Admin\Controllers;

use App\Models\CmfAccessprepay;
use App\Models\CmfSupply;
use App\Models\CmfLinkman;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfAccessprepayController extends AdminController {

	protected $title = "预付款记录";

    public function index(Content $content)
    {
        return $content
            ->header('预付款记录')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfAccessprepay());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyname', __('供应商名称'))->display(function (){
                    return $this->CmfSupply['supplyname'];});
                $grid->column('linkmanname', __('联系人名称'))->display(function (){
                    return $this->CmfLinkman['linkmanname'];});
                $grid->column('jine', __('金额'));
                $grid->column('createman', __('创建人'));
                $grid->column('guanlianbillid', '关联清单ID');
                $grid->column('opertype', '操作类型')
                    ->display(function ($opertype) {
                        return $opertype ? '是' : '否';
                    });
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfAccessprepay());
                $form->select('supplyid', __('供应商ID'))
                ->options(CmfSupply::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_accessprepays',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->select('linkmanid', __('联系人ID'))
                ->options(CmfLinkman::pluck('linkmanname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('curchuzhi', __('预支出'))->symbol('￥')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('金额'))->symbol('￥')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('opertype', __('操作类型'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('guanlianbillid', __('关联清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->text('billdeptid', __('清单部门ID'))->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('accountid', __('帐户ID'))->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('预付款记录');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('预付款记录')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfAccessprepay());
        return $content
            ->header('预付款记录')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfAccessprepay::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyname', __('供应商名称'))->as(function ($CmfSupply) {
                return $this->CmfSupply['supplyname'];
            });
        $show->field('linkmanname', __('联系人名称'))->as(function ($CmfLinkman) {
                return $this->CmfLinkman['linkmanname'];
            });
        $show->field('curchuzhi', __('预支出'));
        $show->field('jine', __('金额'));
        $show->field('createman', __('创建人'));
        $show->field('opertype', __('操作类型'))->as(function($opertype) {
            if($opertype == 1) {
                $opertype='已处理';
            }else {
                $opertype='未处理';
            }
            return $opertype;
        });
        $show->field('guanlianbillid', __('关联清单ID'));
        $show->field('createtime', __('创建时间'));
        $show->field('billdeptid', __('清单部门ID'));
        $show->field('accountid', __('帐户ID'));
        $show->field('beizhu', __('备注'));
        return $show;
        }
}

?>