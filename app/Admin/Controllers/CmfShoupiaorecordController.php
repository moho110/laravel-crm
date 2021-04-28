<?php

namespace App\Admin\Controllers;

use App\Models\CmfShoupiaorecord;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfShoupiaorecordController extends AdminController {

	protected $title = "收票记录";

    public function index(Content $content)
    {
        return $content
            ->header('收票记录')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfShoupiaorecord());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyid', __('供应商ID'));
                $grid->column('caigoubillid', __('采购清单ID'));
                $grid->column('piaojutype', __('票据类型'));
                $grid->column('piaojujine', __('票据金额'));
                $grid->column('fapiaono', '发票编号');
                $grid->column('ifhuikuan', '是否回款')
                    ->display(function ($ifhuikuan) {
                        return $ifhuikuan ? '是' : '否';
                    });
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfShoupiaorecord());
                $form->number('supplyid', __('供应商ID'))
                ->creationRules('required|max:200|unique:cmf_shoupiaorecord',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('caigoubillid', __('采购清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('kaipiaoneirong', __('开票内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('piaojutype', __('票据类型'))->options(['1' => '普通','0' => '特殊'])
                ->rules('required');
                $form->currency('piaojujine', __('票据金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('fapiaono', __('发票编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('kaipiaodate', __('开票日期'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->text('qici', __('期次'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('kaipiaoren', __('开票人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('ifhuikuan', __('是否汇款'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('huikuanid', __('汇款ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('收票记录');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('收票记录')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfShoupiaorecord());
        return $content
            ->header('收票记录')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfShoupiaorecord::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('supplyid', __('供应商ID'));
        $show->field('caigoubillid', __('采购清单ID'));
        $show->field('kaipiaoneirong', __('开票内容'));
        $show->field('piaojutype', __('票据类型'));
        $show->field('piaojujine', __('票据金额'));
        $show->field('fapiaono', __('发票编号'));
        $show->field('kaipiaodate', __('开票日期'));
        $show->field('qici', __('期次'));
        $show->field('kaipiaoren', __('开票人'));
        $show->field('ifhuikuan', __('是否汇款'));
        $show->field('huikuanid', __('汇款ID'));
        $show->field('beizhu', __('备注'));
        $show->field('createtime', __('创建时间'));
        return $show;
        }
}

?>