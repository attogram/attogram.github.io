---
layout: default
title: Blog
---

# Blog

Welcome to the blog!

## Posts

<ul>
  {% for post in site.posts %}
    <li>
      <span class="post-date">{{ post.date | date: "%b %-d, %Y" }}</span>
      <a href="{{ site.baseurl }}{{ post.url }}">{{ post.title }}</a>
    </li>
  {% endfor %}
</ul>

<p><a href="../">&larr; Back to Portfolio</a></p>
