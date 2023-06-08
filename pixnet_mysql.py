# pip install newsapi-python
# # pip install pymongo
# https://newsapi.org/docs/client-libraries/python

import json
from newsapi import NewsApiClient
import urllib.parse
import requests
import os
import pymysql

# Init
newsapi = NewsApiClient(api_key='48372ffa2a414b47be7edab6a2cc5d25')


# /v2/everything
all_articles = newsapi.get_everything(q='人工智慧',
                                      sources= None,
                                      # from_param='2021-01-01',
                                      # to='2021-01-31',
                                      language='zh',
                                      sort_by='publishedAt',
                                      page_size = 100,
                                      page=1)

# print(all_articles) 也可以不要寫進json檔, 直接從 all_articles 取值

# 寫入json 
json_str = json.dumps(all_articles, ensure_ascii=False)

with open('article.json', 'w', encoding='utf-8') as f:
    f.write(json_str)
print(json_str)


# 連接 MySQL 資料庫
conn = pymysql.connect(host='localhost', user='root', password='000000', db='test')

# 創建一個游標物件
cursor = conn.cursor()

# 讀取 JSON 檔案
with open('article.json', 'r', encoding='utf-8') as file:
    json_data = json.load(file)
    

# 解析 JSON 資料並插入到 MySQL
for item in json_data['articles']:
    # 提取需要的欄位值
    source = item['source']['name']
    author = item['author']
    title = item['title']
    description = item['description']
    url = item['url']


    # 定義插入資料的SQL語句
    sql = "INSERT INTO articles (source, author, title, description, url) VALUES (%s, %s, %s, %s, %s)"
    values = (source, author, title, description, url)

    # 執行SQL語句，將values寫入資料庫(資料表先在mysql建好)
    cursor.execute(sql, values)
    
    # 提交變更到資料庫
    conn.commit()


# 關閉游標和連接
cursor.close()
conn.close()
