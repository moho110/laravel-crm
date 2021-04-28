<?php

namespace App\Admin\Controllers;

use App\Models\CmfFahuodan;
use App\Models\CmfCustomer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfFahuodanController extends AdminController {

	protected $title = "发货单";

    public function index(Content $content)
    {
        return $content
            ->header('发货单')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfFahuodan());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyname', __('客户ID'))->display(function (){
                    return $this->CmfCustomer['supplyname'];});
                $grid->column('dingdanbillid', __('订单清单ID'));
                $grid->column('fahuoren', __('发货人'));
                $grid->column('fahuodate', __('发货日期'));
                $grid->column('shouhuoren', '收货人');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfFahuodan());
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_fahuodan',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('dingdanbillid', __('订单清单ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('fahuodan', __('发货单'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('fahuoren', __('发货人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('fahuodate', __('发货日期'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('shouhuoren', __('收货人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('tel', __('电话号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('address', __('联系地址'))
               ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('mailcode', __('邮政编码'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('fahuotype', __('发货类型'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('state', __('状态'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('package', __('包裹'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('weight', __('重量'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('yunfei', __('运费'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('jiesuantype', __('结算类型'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('totalnum', __('总数'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('totalmoney', __('总金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('outtype', __('输出类型'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('发货单');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('发货单')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfFahuodan());
        return $content
            ->header('发货单')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfFahuodan::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('dingdanbillid', __('订单清单ID'));
        $show->field('fahuodan', __('发货单'));
        $show->field('fahuoren', __('发货人'));
        $show->field('fahuodate', __('发货日期'));
        $show->field('shouhuoren', __('收货人'));
        $show->field('tel', __('电话号码'));
        $show->field('address', __('联系地址'));
        $show->field('mailcode', __('邮政编码'));
        $show->field('fahuotype', __('发货类型'));
        $show->field('state', __('状态'));
        $show->field('package', __('包裹'));
        $show->field('weight', __('重量'));
        $show->field('yunfei', __('运费'));
        $show->field('jiesuantype', __('结算类型'));
        $show->field('beizhu', __('备注'));
        $show->field('totalnum', __('总数'));
        $show->field('totalmoney', __('总金额'));
        $show->field('outtype', __('输出类型'));
        return $show;
        }
}

?>