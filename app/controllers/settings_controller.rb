class SettingsController < ApplicationController
respond_to :html, :json

def new
  respond_with Setting.new
end

def index
  respond_with Setting.all 
end

def show
  respond_with Setting.find(params[:id])
end

def create
  respond_with Setting.create(params[:setting])
end

def update
  respond_with Setting.update(params[:id], params[:setting])
end

def destroy
  respond_with Setting.destroy(params[:id])
end

end