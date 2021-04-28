<?php

namespace App\Admin\Controllers;

use App\Models\CmfStoreInit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfStoreInitController extends AdminController {

	protected $title = "库存初始化";

    public function index(Content $content)
    {
        return $content
            ->header('库存初始化')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfStoreInit());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('prodid', __('产品ID'));
                $grid->column('storeid', __('库存ID'));
                $grid->column('price', __('价格'));
                $grid->column('num', __('数量'));
                $grid->column('jine', '金额');
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfStoreInit());
                $form->text('prodid', __('产品ID'))
                ->creationRules('required|max:200|unique:cmf_store_init',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('storeid', __('库存ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('price', __('产品价格'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('num', __('产品数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('flag', __('标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('prodname', __('产品名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('guige', __('规格'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('xinghao', __('型号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('danwei', __('单位'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('typename', __('类型名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('库存初始化');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('库存初始化')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfStoreInit());
        return $content
            ->header('库存初始化')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfStoreInit::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('prodid', __('产品ID'));
        $show->field('storeid', __('库存ID'));
        $show->field('price', __('产品价格'));
        $show->field('num', __('产品数量'));
        $show->field('jine', __('金额'));
        $show->field('memo', __('备注'));
        $show->field('flag', __('标识'));
        $show->field('prodname', __('产品名称'));
        $show->field('guige', __('规格'));
        $show->field('xinghao', __('型号'));
        $show->field('danwei', __('单位'));
        $show->field('typename', __('类型名称'));
        return $show;
        }
}

?>