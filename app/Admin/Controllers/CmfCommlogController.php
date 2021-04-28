<?php

namespace App\Admin\Controllers;

use App\Models\CmfCommlog;
use App\Models\CmfCustomer;
use App\Models\CmfLinkman;
use App\Models\CmfProduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCommlogController extends AdminController {

	protected $title = "通用日志";

    public function index(Content $content)
    {
        return $content
            ->header('通用日志')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCommlog());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('sysuser', __('系统用户'));
                $grid->column('user_id', __('用户ID'));
                $grid->column('commdate', __('日期'));
                $grid->column('linkmanname', __('联系人ID'))->display(function (){
                    return $this->CmfLinkman['linkmanname'];});
                $grid->column('productname', __('产品ID'))->display(function (){
                    return $this->CmfProduct['productname'];});
                $grid->column('iscompete', '是否完成')
                    ->display(function ($iscompete) {
                        return $iscompete ? '是' : '否';
                    });
                    
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCommlog());
                $form->text('sysuser', __('系统用户'))
                ->creationRules('required|max:200|unique:cmf_commlog',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('commdate', __('日志日期'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('linkmanid', __('联系人ID'))
                ->options(CmfLinkman::pluck('linkmanname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('project', __('项目'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('productid', __('产品ID'))
                ->options(CmfProduct::pluck('productname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('projectphase', __('项目简介'))
                ->creationRules('required', ['required' => '不能大于200个字符']);
                $form->radio('iscompete', __('是否完成'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('comminfo', __('日志信息'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('moniterinfo', __('监视信息'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('moniterman', __('监视人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('通用日志');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('通用日志')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCommlog());
        return $content
            ->header('通用日志')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCommlog::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('sysuser', __('系统用户'));
        $show->field('user_id', __('用户ID'));
        $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('commdate', __('日志日期'));
        $show->field('linkmanname', __('联系人ID'))->as(function ($CmfLinkman) {
                return $this->CmfLinkman['linkmanname'];
            });
        $show->field('project', __('项目'));
        $show->field('productname', __('产品ID'))->as(function ($CmfProduct) {
                return $this->CmfProduct['productname'];
            });
        $show->field('projectphase', __('项目简介'));
        $show->field('iscompete', __('是否完成'));
        $show->field('comminfo', __('日志信息'));
        $show->field('moniterinfo', __('监视信息'));
        $show->field('moniterman', __('监视人'));
        $show->field('user_flag', __('用户标识'));
        return $show;
        }
}

?>