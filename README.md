# PHP Application

This is a `CSV Parser` application which will process data file and write it to the SQL DB.

## Features

* Web UI to show all processed data.
* Action buttons to view, delete and update data.

## Orchestration Options

* Docker container
* kubernetes helm chart

## Steps to use

* This application can be deployed onto kubernetes cluster as highly available application. Please check this [kubernetes blog](https://medium.com/@sinha.shashank.1989/automate-rds-aws-kubernetes-cluster-with-kops-and-terraform-84ee72916c43) to deploy it from scratch.

* This can run as standalone docker container. If so make sure `config.php` contains all required DB information.


