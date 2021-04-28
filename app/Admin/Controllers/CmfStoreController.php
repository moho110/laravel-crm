<?php

namespace App\Admin\Controllers;

use App\Models\CmfStore;
use App\Models\CmfProduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfStoreController extends AdminController {

	protected $title = "库存清单";

    public function index(Content $content)
    {
        return $content
            ->header('库存清单')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfStore());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('productname', __('产品ID'))->display(function (){
                    return $this->CmfProduct['productname'];});
                $grid->column('num', __('数量'));
                $grid->column('price', __('产品价格'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfStore());
                $form->select('prodid', __('产品ID'))
                ->options(CmfProduct::pluck('productname','id'))
                ->creationRules('required|max:200|unique:cmf_store',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('num', __('产品数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('price', __('产品价格'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('storeid', __('库存ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200|unique:cmf_crm_mytable',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('库存清单');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('库存清单')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfStore());
        return $content
            ->header('库存清单')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfStore::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('productname', __('产品ID'))->as(function ($CmfProduct) {
                return $this->CmfProduct['productname'];
            });
        $show->field('num', __('产品数量'));
        $show->field('price', __('产品价格'));
        $show->field('storeid', __('库存ID'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>