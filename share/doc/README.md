ScatBay/Articles
===

基于 [Markdown][] 撰写方法，汇集不同作者发表内容的标签化文章库系统。

功能特性
---

### 1. [GitHub 风格 Markdown][Markdown] 直接撰写

使用诸多专（免）业（费）的 [Markdown][] 写作工具（如：[MacDown](http://macdown.uranusjr.com/)），我们可以在任何场合充分利用碎片时间，所见即所得地撰写文章。

发表时，只需要将整篇文章的 [Markdown][] 代码复制到输入框中即可。

系统会自动识别文章中的 **一级标题** 作为 *文章标题*，识别 **首段正文段落** 作为 *文章简介* 。

### 2. 通过标签串联诸多文章

对一篇文章按需打上任意数量的标签，可以更细粒度地标记出文章涉及的领域、涵盖的知识点、独有的亮点、甚至与同系列的其它文章之间关系等等。

### 3. 多作者共同创作

不同来源、不同兴趣爱好的作者，会发表自己所关注领域的不同文章。在标签功能的帮助下，同一领域的不同作者的文章产生了关联和碰撞。这种化学反应进一步地放大了每篇文章的价值。

持续改进
---

- [x] 从 [Markdown][] 中识别标题和简介
- [x] 标签功能
- [ ] 文章列表页和阅读页的静态化页面缓存
- [ ] 第三方嵌入式评论

安装部署
---

详见 [ScatBay/Articles 部署指南](INSTALL.md) 。

特别感谢
---

* [Zen](https://github.com/php-zen) - 用于快速开发的 [PHP](http://cn.php.net/) 框架
* [cebe/markdown](https://github.com/cebe/markdown) - [Markdown][] 解析器组件
* [TWIG](http://twig.sensiolabs.org/) 模板引擎组件

[Markdown]: https://help.github.com/articles/github-flavored-markdown
