<?php

namespace App\Admin\Controllers;

use App\Models\CmfStoreColor;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfStoreColorController extends AdminController {

	protected $title = "仓库颜色";

    public function index(Content $content)
    {
        return $content
            ->header('仓库颜色')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfStoreColor());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('color', __('颜色'));
                $grid->column('num', __('数量'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfStoreColor());
                $form->number('color', __('颜色'))
                ->creationRules('required|max:200|unique:cmf_store_color',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('num', __('数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('仓库颜色');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('仓库颜色')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfStoreColor());
        return $content
            ->header('仓库颜色')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfStoreColor::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('color', __('颜色'));
        $show->field('num', __('数量'));
        return $show;
        }
}

?>