pipeline {  
  agent {
    label 'docker'
  }
  options {
    buildDiscarder(logRotator(numToKeepStr: '5'))
  }
  environment {
    HEROKU_API_KEY = credentials('heroku-api-key') // Github
    DOCKER_HUB_CREDENTIALS = credentials('docker-hub-credentials') // Docker Hub
    IMAGE_NAME = 'ivanaki/jenkins-example-symfony'
    IMAGE_TAG = 'latest'
    APP_NAME = 'jenkins-example-symfony'
  }
  stages {
    stage('Build') {
      steps {
        sh 'echo $PATH'
        sh 'whoami'
        sh 'docker build -t $IMAGE_NAME:$IMAGE_TAG .'
      }
    }
    stage('Publish to Docker Hub') {
      steps {
        withCredentials([[$class: 'UsernamePasswordMultiBinding', credentialsId: 'docker-hub-credentials', usernameVariable: 'DOCKER_HUB_USERNAME', passwordVariable: 'DOCKER_HUB_PASSWORD']]) {
          script {
            sh "docker login -u $DOCKER_HUB_USERNAME -p $DOCKER_HUB_PASSWORD"
            sh "docker push $IMAGE_NAME:$IMAGE_TAG"
          }
        }
      }
    }
  }
}

