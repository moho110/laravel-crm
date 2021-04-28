<?php

namespace App\Admin\Controllers;

use App\Models\CmfFukuanrecord;
use App\Models\CmfSupply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfFukuanrecordController extends AdminController {

	protected $title = "付款记录";

    public function index(Content $content)
    {
        return $content
            ->header('付款记录')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfFukuanrecord());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyname', __('供应商ID'))->display(function (){
                    return $this->CmfSupply['supplyname'];});
                $grid->column('caigoubillid', __('采购清单ID'));
                $grid->column('paydate', __('支付日期'));
                $grid->column('jine', __('金额'));
                $grid->column('accountid', '帐户ID');
                $grid->column('ifkaipiao', '是否开票')
                    ->display(function ($ifkaipiao) {
                        return $ifkaipiao ? '是' : '否';
                    });
                
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfFukuanrecord());
                $form->select('supplyid', __('供应商ID'))
                ->options(CmfSupply::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_fukuanrecord',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->number('caigoubillid', __('采购清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('qici', __('期次'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('paydate', __('支付日期'))
                ->creationRules('required',
                        ['required' => '此项不能为空']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('ifkaipiao', __('是否开票'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->number('accountid', __('帐户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->number('guanlianplanid', __('关联计划ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('oddment', __('零碎业务'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('付款记录');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('付款记录')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfFukuanrecord());
        return $content
            ->header('付款记录')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfFukuanrecord::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyname', __('供应商ID'))->as(function ($CmfSupply) {
                return $this->CmfSupply['supplyname'];
            });
        $show->field('caigoubillid', __('采购清单ID'));
        $show->field('qici', __('期次'));
        $show->field('paydate', __('支付日期'));
        $show->field('jine', __('金额'));
        $show->field('ifkaipiao', __('是否开票'));
        $show->field('accountid', __('帐户ID'));
        $show->field('beizhu', __('备注'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('guanlianplanid', __('关联计划ID'));
        $show->field('oddment', __('零碎业务'));
        return $show;
        }
}

?>